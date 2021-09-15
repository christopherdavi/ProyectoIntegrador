import { Component, OnInit } from '@angular/core';
import { Products } from '../../class/products';
import { ActivatedRoute, Router } from '@angular/router';
import { ServicesService } from '../../services/services.service';
@Component({
  selector: 'app-manage-products-edit',
  templateUrl: './manage-products-edit.component.html',
  styleUrls: ['./manage-products-edit.component.css']
})
export class ManageProductsEditComponent implements OnInit {

  constructor(private route:ActivatedRoute,private router:Router,private ServicesService:ServicesService) { }
  id:any;
  data:any;
  product=new Products();
  
  ngOnInit(): void {
    this.id=this.route.snapshot.params.id;
    this.getProductsData()
  }
  getProductsData() {
    this.ServicesService.getProductsById(this.id).subscribe(res => {
      console.log(res);
      this.data = res;
      this.product = this.data;
      console.log(this.data);
    })
  }
  updateProducts() {
    this.ServicesService.updateProductsData(this.id, this.product).subscribe(res => {
      console.log(res);
    this.router.navigate(['/manage-products'])
    });
  }
}