import { Component, OnInit, Input } from '@angular/core';
import { Categories } from '../../class/categories';
import { ServicesService } from 'src/app/services/services.service';
import { Router } from '@angular/router';
import { subCategories } from 'src/app/class/subCategories';

@Component({
  selector: 'app-main-page',
  templateUrl: './main-page.component.html',
  styleUrls: ['./main-page.component.css']
})
export class MainPageComponent implements OnInit {
<<<<<<< HEAD
  subCategories:any;
  subCategory= new subCategories();
=======
  categorie = new Categories();
>>>>>>> fec443253fe506cbeb5b7ca253e8be10976e4f72
  categories: any;
  search: string = 'El buscador esta buscando';
  @Input() products: any;

  constructor(private router:Router, private ServicesServices: ServicesService) { }

  ngOnInit(): void {
    this.getCategorieData();
  }
  getCategorieData() {
    this.ServicesServices.getCategoriesData().subscribe(res => {
      console.log(res);
      this.categories = res;
    })
<<<<<<< HEAD
}
getCategories(){
  this.ServicesServices.getcatjoinSub().subscribe(
    res =>{
      console.log (res);
      this.subCategories = res['data'];
    }
  )
  
}

}
=======
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
>>>>>>> fec443253fe506cbeb5b7ca253e8be10976e4f72
