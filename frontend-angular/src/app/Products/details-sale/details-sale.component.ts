import { Component, OnInit, Input } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ServicesService } from '../../services/services.service';
import { Products } from '../../class/products';

@Component({
  selector: 'app-details-sale',
  templateUrl: './details-sale.component.html',
  styleUrls: ['./details-sale.component.css']
})
export class DetailsSaleComponent implements OnInit {
  id: any;
  product = new Products();
  products: any;
  search: string = 'El buscador esta buscando';
  @Input() prod: any;

  constructor(private router:Router,private route: ActivatedRoute, private ServicesService: ServicesService) { }

  ngOnInit(): void {
    this.id = this.route.snapshot.params.id;
    this.getProductData();
  }
  backHome(){
    this.router.navigate(['/main-page']);
  }
  /* Detalle de los productos */
  getProductData() {
    this.ServicesService.getProductById(this.id).subscribe(res => {
      console.log(res);
      this.products = res['data'];
    })
  }
  /* función para el buscador */
  getNameProdcutata(search: string) {
    this.search = search;

    this.ServicesService.readProducts(this.search).subscribe(res => {
      this.prod = res['products'];
    })
    this.router.navigate(['/search-articles']);
  }
}
