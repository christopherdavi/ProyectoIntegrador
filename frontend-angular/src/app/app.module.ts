import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AdvertisingFlyersComponent } from './Components/Advertising/advertising-flyers/advertising-flyers.component';
import { AdvertisingBannersComponent } from './Components/Advertising/advertising-banners/advertising-banners.component';
import { AdvertisingRecomendedComponent } from './Components/Advertising/advertising-recomended/advertising-recomended.component';

import { RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { CategoriesComponent } from './Products/categories/categories.component';

import { ArticuleComponent } from './Products/articule/articule.component';
import { ManageCategoriesComponent } from './Products/manage-categories/manage-categories.component';
import { ManageSubcategoriesComponent } from './Products/manage-subcategories/manage-subcategories.component';
import { ManageArticulesComponent } from './Products/manage-articules/manage-articules.component';
import { ManageProductsComponent } from './Products/manage-products/manage-products.component';
import { NavbarManageComponent } from './Products/navbar-manage/navbar-manage.component';
import { ManageCategoriesEditComponent } from './Products/manage-categories-edit/manage-categories-edit.component';
import { NavEcushopComponent } from './Products/nav-ecushop/nav-ecushop.component';
import { ManageArticulesEditComponent } from './Products/manage-articules-edit/manage-articules-edit.component';
import { ManageProductsEditComponent } from './Products/manage-products-edit/manage-products-edit.component';
import { ManageSubCategoriesEditComponent } from './Products/manage-sub-categories-edit/manage-sub-categories-edit.component';
import { MainPageComponent } from './Products/main-page/main-page.component';
import { DetailsSaleComponent } from './Products/details-sale/details-sale.component';
import { NgxPaginationModule } from 'ngx-pagination';
import { SubmenuComponent } from './Products/submenu/submenu.component';
import { readdir } from 'fs';

const route: Routes = [
  { path: 'manage-categories', component: ManageCategoriesComponent },
  { path: 'manage-subcategories', component: ManageSubcategoriesComponent },
  { path: 'manage-products', component: ManageProductsComponent },
  { path: 'manage-articules', component: ManageArticulesComponent },
  { path: 'navbar-manage', component: NavbarManageComponent },
  { path: 'manage-categories/edit-categorie/:id', component: ManageCategoriesEditComponent },
  { path: 'manage-articules/edit-articules/:id', component: ManageArticulesEditComponent },
  { path: 'manage-products/edit-products/:id', component: ManageProductsEditComponent },
  {path:  'submenu',component:SubmenuComponent},
  { path: 'manage-subcategories/edit-subcategorie/:id', component: ManageSubCategoriesEditComponent },
  { path: 'main-page', component: MainPageComponent },
  { path: 'search-articles', component: ArticuleComponent },
  { path: 'categories', component: CategoriesComponent },
  { path: 'categories/sale/:id', component: DetailsSaleComponent },
  { path: 'search-articles/sale/:id', component: DetailsSaleComponent },
  { path: '**', redirectTo: 'main-page', pathMatch: 'full' },
]
@NgModule({
  declarations: [
    AppComponent,
    ManageCategoriesComponent,
    ManageSubcategoriesComponent,
    ManageArticulesComponent,
    ManageProductsComponent,
    NavbarManageComponent,
    ManageCategoriesEditComponent,
    CategoriesComponent,
    ArticuleComponent,
    NavEcushopComponent,
    ManageArticulesEditComponent,
    ManageProductsEditComponent,
    ManageSubCategoriesEditComponent,
    MainPageComponent,
    DetailsSaleComponent,
    SubmenuComponent,
  
  ],
  imports: [
    BrowserModule, AppRoutingModule,
    RouterModule.forRoot(route),
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    NgxPaginationModule,
  ],
  providers: [],
  bootstrap: [AppComponent],
})

export class AppModule { }
 