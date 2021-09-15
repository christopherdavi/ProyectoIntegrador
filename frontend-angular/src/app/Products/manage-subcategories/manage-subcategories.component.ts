import { Component, OnInit } from '@angular/core';
import { ServicesService } from 'src/app/services/services.service';
import { subCategories } from '../../class/subcategories';
import { FormGroup, Validators, FormBuilder, AbstractControl } from '@angular/forms';
import { Categories } from '../../class/categories';

@Component({
  selector: 'app-manage-subcategories',
  templateUrl: './manage-subcategories.component.html',
  styleUrls: ['./manage-subcategories.component.css']
})
export class ManageSubcategoriesComponent implements OnInit {
  // -----------------------
  // Atributos de la clase.
  // -----------------------
  public createSubCategorieForm: FormGroup;

  subcategories: any;
  subcategorie= new subCategories();
  category = new Categories();
  categories: any;
  test:any;
  constructor(private ServicesServices: ServicesService,
              private formBuilder: FormBuilder) { }

  ngOnInit(): void {
    this.getsubCategorieData();
    this.getMyCategoryId();
    // validaciones
    this.createSubCategorieForm = this.formBuilder.group({
      name: ['', [
        Validators.required,
        Validators.minLength(3),
      ]],
      idSubcategories:[
        Validators.required
      ]
    });
  }
  getsubCategorieData() {
    this.ServicesServices.getsubCategoriesData().subscribe(res => {
      console.log(this.subcategorie);
      this.subcategories = res;
    })
  }
  insertDatasubCategories() {
    console.log(this.subcategories);
    this.ServicesServices.insertsubCategorieData(this.subcategorie).subscribe(res => {
      console.log(res);
      this.getsubCategorieData();
    })
  }
  deleteDatasubCategories(id: any) {
    console.log(id);
    this.ServicesServices.deletesubCategorieData(id).subscribe(res => {
      this.getsubCategorieData();
      console.log(res);
    }
    );
    this.getsubCategorieData();
  }
  // getters del createCategorieForm
  get name(): AbstractControl {
    return this.createSubCategorieForm.get('name');
  }

  get idSubcategories(): AbstractControl {
    return this.createSubCategorieForm.get('idSubcategories');
  }

   /* get para obtener el id de las categorias */
   getMyCategoryId() {
    this.ServicesServices.getCategoryId().subscribe(res => {
      this.categories = res['data'];
    })
  }
  
}

