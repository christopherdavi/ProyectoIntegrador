import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Categories } from '../class/categories';
import { Articule } from '../class/articule';
import { Products } from '../class/products';
import { subCategories } from '../class/subCategories';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ServicesService {

  constructor(private httpClient: HttpClient) { }
  //buscador de productos
  readProducts(search: string) {
   /*  return this.httpClient.get('http://127.0.0.1:8000/api/searchProduct/', { params: { buscarProducto: query } }); */
    return this.httpClient.get<Products[]>(`${this.url}/searchProduct/${search}`)
  }
  
  private url = 'http://localhost:8000/api';

  //categories
  getCategoriesData() {
    return this.httpClient.get('http://127.0.0.1:8000/api/categories');
  }
  insertCategorieData(data: Categories) {
    return this.httpClient.post('http://127.0.0.1:8000/api/categories', data);
  }
  deleteCategorieData(id: any) {
    return this.httpClient.delete(`http://127.0.0.1:8000/api/categories/${id}`);
  }
  getCategorieById(id: any) {
    return this.httpClient.get(`http://127.0.0.1:8000/api/categories/${id}`);
  }
  updateCategorieData(id: any, data: Categories) {
    return this.httpClient.put(`http://127.0.0.1:8000/api/categories/${id}`, data);
  }
  //articules
  getArticulesData() {
    return this.httpClient.get<Articule[]>(`${this.url}/getAllArti`);
  }

  crearE(code: string, codePostal: string, stock: string, description: string, id_sub_categories: string, file: File): Observable<Object> {
    const form = new FormData()
    form.append('code', code);
    form.append('codePostal', codePostal);
    form.append('stock', stock);
    form.append('description', description);
    form.append('id_sub_categories', id_sub_categories);
    form.append('file', file, 'form-data');

    return this.httpClient.post<Object>(`${this.url}/createArticule`, form)
  }
  deleteArticuleData(id: any) {
    return this.httpClient.delete(`http://127.0.0.1:8000/api/articules/${id}`);
  
  }
  getArticuleById(id: any) {
    return this.httpClient.get(`http://127.0.0.1:8000/api/categories/${id}`);
  }
  
  updateArticuleData(id: any, dataArticule: Articule) {
    return this.httpClient.put(`http://127.0.0.1:8000/api/categories/${id}`, dataArticule);
  }
  //products
  getProductsData() {
    return this.httpClient.get('http://127.0.0.1:8000/api/products');
  }
  insertProductData(dataproducts: Products) {
    return this.httpClient.post('http://127.0.0.1:8000/api/product', dataproducts);
  }
  deleteProductData(id: any) {
    return this.httpClient.delete(`http://127.0.0.1:8000/api/products/${id}`);
  }
  getProductsById(id: any) {
    return this.httpClient.get(`http://127.0.0.1:8000/api/products/${id}`);
  }
  updateProductsData(id: any, dataproducts: Products) {
    return this.httpClient.put(`http://127.0.0.1:8000/api/products/${id}`, dataproducts);
  }

  //subcategorias
  getsubCategoriesData() {
    return this.httpClient.get('http://127.0.0.1:8000/api/subCategories');
  }
  insertsubCategorieData(data: subCategories) {
    return this.httpClient.post('http://127.0.0.1:8000/api/subCategories', data);
  }
  deletesubCategorieData(id: any) {
    return this.httpClient.delete(`http://127.0.0.1:8000/api/subCategories/${id}`);
  }
  getsubCategorieById(id: any) {
    return this.httpClient.get(`http://127.0.0.1:8000/api/subCategories/${id}`);
  }
  updatesubCategorieData(id: any, data: subCategories) {
    return this.httpClient.put(`http://127.0.0.1:8000/api/subCategories/${id}`, data);
  }
  //articules
  getProductsDataJoin() {
    return this.httpClient.get<Articule[]>(`${this.url}/allP`);
  }
  //names articules
  getNameCategoriesData(){
    return this.httpClient.get<Categories[]>(`${this.url}/nameSubcategories`);
  }

  //id articles
  getArticleId(){
    return this.httpClient.get('http://127.0.0.1:8000/api/articleId');
  }
  getSubCategoryId(){
    return this.httpClient.get('http://127.0.0.1:8000/api/subCategoryId');
  }
  getCategoryId(){
    return this.httpClient.get('http://127.0.0.1:8000/api/categoryId');
  }

  /* pruba detalle productos */
  getProductById(id: any) {
    return this.httpClient.get(`http://127.0.0.1:8000/api/allP/${id}`);
  }

  /* productos x categoria */
  getProductByIdCategorie(id: any) {
    /* return this.httpClient.get(`http://127.0.0.1:8000/api/allPbyCat/${id}`); */
    return this.httpClient.get<Products[]>(`${this.url}/allPbyCat/${id}`);
  }

 getcatjoinSub(){
  return this.httpClient.get<Categories[]>(`${this.url}/listSubcat`);
 }

}
 