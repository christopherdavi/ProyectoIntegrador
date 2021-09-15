import { Component, OnInit, Input } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { Products } from '../../class/products';
import { Router } from '@angular/router';

@Component({
  selector: 'app-articule',
  templateUrl: './articule.component.html',
  styleUrls: ['./articule.component.css']
})
export class ArticuleComponent implements OnInit {
  search: string = 'l buscador esta buscando';
  @Input() products: any;
  product = new Products();
  
  constructor(private ServicesServices: ServicesService) { }

  ngOnInit(): void {
    //buscador
    this.getNameProdcutata(this.search);
    this.getProducts()
  }
  getNameProdcutata(search: string) {
    this.search = search;
    console.log(this.search)

    this.ServicesServices.readProducts(this.search).subscribe(res => {
      console.log(res);
      this.products = res['products'];
      
    })
  }
  getProducts(){
    this.ServicesServices.getProductsDataJoin().subscribe(res => {
      console.log(res)
      this.products = res['data'];
    });
  }
}