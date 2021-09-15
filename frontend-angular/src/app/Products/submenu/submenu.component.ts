import { Component, OnInit } from '@angular/core';
import { ServicesService } from 'src/app/services/services.service';
import { Categories } from '../../class/categories';
import { subCategories } from '../../class/subCategories';
@Component({
  selector: 'app-submenu',
  templateUrl: './submenu.component.html',
  styleUrls: ['./submenu.component.css']
})
export class SubmenuComponent implements OnInit {
 subCategories:any;
 subCategory= new subCategories();
 categories:any[
   
  ];
  constructor(private ServicesServices:ServicesService) {}
 
  ngOnInit(): void {
    this.getCategories();
  }
  getCategories(){
    this.ServicesServices.getcatjoinSub().subscribe(
      res =>{
        console.log (res);
        this.subCategories = res['data'];
        /*res=Object.values(this.subCategories);*/
      }
    )
    
  }
  
}
