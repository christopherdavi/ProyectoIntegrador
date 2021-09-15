import { Component, OnInit } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { Categories } from '../../class/categories';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators, AbstractControl } from '@angular/forms';


@Component({
  selector: 'app-manage-categories-edit',
  templateUrl: './manage-categories-edit.component.html',
  styleUrls: ['./manage-categories-edit.component.css']
})
export class ManageCategoriesEditComponent implements OnInit {
  public editCategorieForm: FormGroup;

  constructor(private route: ActivatedRoute,private router:Router, 
    private ServicesService: ServicesService,  private formBuilder: FormBuilder) { }
  id: any;
  data: any;
  categorie = new Categories();

  ngOnInit(): void {
    this.id = this.route.snapshot.params.id;
    this.getCategoriesData();

    this.editCategorieForm = this.formBuilder.group({
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

  getCategoriesData() {
    this.ServicesService.getCategorieById(this.id).subscribe(res => {
      console.log(res);
      this.data = res;
      this.categorie = this.data;
      console.log(this.data);
    })
  }
  updateDataCategories() {
    this.ServicesService.updateCategorieData(this.id, this.categorie).subscribe(res => {
      console.log(res);
    this.router.navigate(['/manage-categories'])
    });
  }
  // getters del loginForm
  get name(): AbstractControl {
    return this.editCategorieForm.get('name');
  }
  get condition(): AbstractControl {
    return this.editCategorieForm.get('condition');
  }
  get icon(): AbstractControl {
    return this.editCategorieForm.get('icon');
  }
}
