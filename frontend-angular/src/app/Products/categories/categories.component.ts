import { Component, OnInit, Input, Output,EventEmitter } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { Categories } from '../../class/categories';
import { Products } from 'src/app/class/products';
import { Router } from '@angular/router';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.css']

})
export class CategoriesComponent implements OnInit {
  @Output() click: EventEmitter<string> = new EventEmitter();
  id: any;

  constructor(private router: Router, private ServicesServices: ServicesService) { }
  categorie = new Categories();
  categories: any;

  product = new Products();
  products: any;
  proCat: any;

  search: string = 'El buscador esta buscando';
  @Input() prod: any;



  ngOnInit(): void {
    this.getCategories()
    this.getProducts()
  }

  getCategories() {
    this.ServicesServices.getCategoriesData().subscribe(res => {
      this.categories = res;
    })
  }
  
  getProducts(){
    this.ServicesServices.getProductsDataJoin().subscribe(res => {
      console.log(res)
      this.products = res['data'];
    });
  }

  searchProCat() {
    this.ServicesServices.getProductByIdCategorie(this.id).subscribe(res => {
      console.log(res);
      this.proCat = res['data'];
    })
  }

  getProByCat() {
    this.click.emit(this.id);
  }

   /* función para el buscador */
   getNameProdcutata(search: string) {
    this.search = search;

    this.ServicesServices.readProducts(this.search).subscribe(res => {
      this.products = res['products'];
    })
    this.router.navigate(['/search-articles']);
  }
}

