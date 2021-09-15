import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { ServicesService } from 'src/app/services/services.service';
import { Products } from '../../class/products';
import { Categories } from '../../class/categories';

@Component({
  selector: 'app-nav-ecushop',
  templateUrl: './nav-ecushop.component.html',
  styleUrls: ['./nav-ecushop.component.css']
})
export class NavEcushopComponent implements OnInit {
  @Output() onEnter: EventEmitter<string> = new EventEmitter();
  search: string = '';


  constructor(private ServicesServices: ServicesService) { }
  categories:any;
  data: any;
  current_produt: Products;

  ngOnInit(): void {
    this.getCategorieData();

  }
  onSearch() {
    this.ServicesServices.readProducts(this.search).subscribe(res => {
      this.data = res;
      this.current_produt = new Products();
    })
  }

  getNameProductData() {
    this.onEnter.emit(this.search);
  }
  getCategorieData() {
    this.ServicesServices.getCategoriesData().subscribe(res => {
      console.log(res);
      this.categories = res;
    })
}
}
