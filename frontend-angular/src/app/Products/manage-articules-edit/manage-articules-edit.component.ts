import { Component, OnInit } from '@angular/core';
import { Articule } from '../../class/articule';
import { ActivatedRoute, Router } from '@angular/router';
import { ServicesService } from '../../services/services.service';

@Component({
  selector: 'app-manage-articules-edit',
  templateUrl: './manage-articules-edit.component.html',
  styleUrls: ['./manage-articules-edit.component.css']
})
export class ManageArticulesEditComponent implements OnInit {
  constructor(private route:ActivatedRoute,private router:Router,private ServicesService:ServicesService) { }
  id:any;
  data:any;
  articule=new Articule();
  
  ngOnInit(): void {
    this.id=this.route.snapshot.params.id;
    this.getArticulesData();
  }
  getArticulesData() {
    this.ServicesService.getArticuleById(this.id).subscribe(res => {
      console.log(res);
      this.data = res;
      this.articule = this.data;
      console.log(this.data);
    })
  }
    updateDataArticules() {
      this.ServicesService.updateArticuleData(this.id, this.articule).subscribe(res => {
        console.log(res);
      this.router.navigate(['/manage-articules'])
      });
    }
  


}
