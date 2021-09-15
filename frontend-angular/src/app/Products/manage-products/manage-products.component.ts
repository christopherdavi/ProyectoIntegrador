import { Component, OnInit } from '@angular/core';
import { ServicesService } from '../../services/services.service';
import { Products } from '../../class/products';
import { Articule } from '../../class/articule';

@Component({
  selector: 'app-manage-products',
  templateUrl: './manage-products.component.html',
  styleUrls: ['./manage-products.component.css']
})
export class ManageProductsComponent implements OnInit {
  product = new Products();
  products: any;
  test: any;
  
  Articule = new Articule();
  articules: any;
  articles: any;

  constructor(private ServicesServices: ServicesService) { }

  ngOnInit(): void {
    this.getProductData();
    this.getMyArticleId();
  }
  getProductData() {
    this.ServicesServices.getProductsData().subscribe(res => {
      console.log(res);
      this.products=res['data'];
    })
  }

  insertDataProducts() {
    console.log(this.product);
    this.ServicesServices.insertProductData(this.product).subscribe(res => {
      console.log(res);
      this.getProductData();
    })
  }

  deleteDataProducts(id: any) {
    console.log(id);
    this.ServicesServices.deleteProductData(id).subscribe(res => {
      this.getProductData();
      console.log(res);
    }
    );
    this.getProductData();
  }

  /* get para obtener el id de los articulos */
  getMyArticleId() {
    this.ServicesServices.getArticleId().subscribe(res => {
      this.articles = res['data'];
    })
  }
}