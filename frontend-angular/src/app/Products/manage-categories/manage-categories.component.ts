import { Component, OnInit } from '@angular/core';
import { ServicesService } from 'src/app/services/services.service';
import { Categories } from '../../class/categories';
import { FormGroup, FormBuilder, Validators, AbstractControl } from '@angular/forms';

@Component({
  selector: 'app-manage-categories',
  templateUrl: './manage-categories.component.html',
  styleUrls: ['./manage-categories.component.css']
})
export class ManageCategoriesComponent implements OnInit {
  // -------------------------------------------------------------------------------
  // Atributos de la clase.
  // -------------------------------------------------------------------------------
  public createCategorieForm: FormGroup;

  categories: any;
  categorie = new Categories();
  test:any;

  constructor(
    private ServicesServices: ServicesService,
    private formBuilder: FormBuilder
    ) 
  {  
    
  }
  ngOnInit(): void {
    this.getCategorieData();
    this.createCategorieForm = this.formBuilder.group({
      name: ['', [
        Validators.required,
        Validators.minLength(3),
        Validators.maxLength(40)
      ]],
      condition: ['', [
        Validators.required
      ]],
      icon:['',[
        Validators.required
      ]]
    });

  }


  getCategorieData() {
    this.ServicesServices.getCategoriesData().subscribe(res => {
      console.log(res);
      this.categories = res;
    })
  }
  insertDataCategories() {
    console.log(this.categorie);
    this.ServicesServices.insertCategorieData(this.categorie).subscribe(res => {
      console.log(res);
      this.getCategorieData();
    });
  }
  deleteDataCategories(id: any) {
    console.log(id);
    this.ServicesServices.deleteCategorieData(id).subscribe(res => {
      this.getCategorieData();
      console.log(res);
    }
    );
    this.getCategorieData();
  }

   // getters del loginForm
   get name(): AbstractControl {
    return this.createCategorieForm.get('name');
  }
  get condition(): AbstractControl {
    return this.createCategorieForm.get('condition');
  }
  get icon(): AbstractControl {
    return this.createCategorieForm.get('icon');
  }
}
