import { Component, OnInit } from '@angular/core';
import { ServicesService } from 'src/app/services/services.service';
import { Articule } from 'src/app/class/articule';
import { FormGroup, FormControl, Validators} from '@angular/forms'; 
import { subCategories } from 'src/app/class/subCategories';

@Component({
  selector: 'app-manage-articules',
  templateUrl: './manage-articules.component.html',
  styleUrls: ['./manage-articules.component.css']
})
export class ManageArticulesComponent implements OnInit {
  articule=new Articule();
  articules:any;
  subCategory = new subCategories();
  subCategories: any;
  imageForm:FormGroup;
  file:any;
  image: any = "../../assets/images/fondo.jpg"; 
  test: any;
 constructor(private ServicesServices:ServicesService) { }

  ngOnInit(): void {
    this.getArticuleData();
    this.getMySubCategoryId();
    this.imageForm = new FormGroup({
      code: new FormControl(null, Validators.required),
      codePostal: new FormControl(null, Validators.required),
      stock: new FormControl(null, Validators.required),
      description: new FormControl(null, Validators.required),
      id_sub_categories: new FormControl(null, Validators.required),
      file: new FormControl(null, Validators.required)
    })
  }
  getArticuleData() {
    this.ServicesServices.getArticulesData().subscribe(res => {
      console.log(res)
      this.articules = res['data'];
    });
  }
  onFileChange(event) {
    if (event.target.files && event.target.files.length > 0) {
      const file = event.target.files[0];
      if (file.type.includes("image")) {
        const reader = new FileReader()
        reader.readAsDataURL(file);

        reader.onload = function load() {
          this.image = reader.result;
        }.bind(this);
        this.file = file;
      } else {
        console.log("error");
      }
    }
  }

  onSubmit() {
    const form = this.imageForm;
    if (form.valid) {
      this.ServicesServices.crearE(form.value.code, form.value.codePostal, form.value.stock, form.value.description, form.value.id_sub_categories, this.file)
        .subscribe(data => {
          this.imageForm = new FormGroup({
            code: new FormControl(null),
            codePostal: new FormControl(null),
            stock: new FormControl(null),
            description: new FormControl(null),
            id_sub_categories: new FormControl(null),
            file: new FormControl(null),

          })
          this.image = "../../assets/images/fondo.jpg";
          console.log(data)
          this.getArticuleData();
        })
    }
  }
  deleteDataArticules(id: any) {
    console.log(id);
    this.ServicesServices.deleteArticuleData(id).subscribe(res => {
      this.getArticuleData();
      console.log(res);
    }
    );
  }

  /* get para obtener el id de los subcategorias */
  getMySubCategoryId() {
    this.ServicesServices.getSubCategoryId().subscribe(res => {
      this.subCategories = res['data'];
    })
  }
}
