import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Category, CategoryJson } from './category.model';
import { environment } from 'src/environments/environment';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ActivatedRoute } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(
    private _http: HttpClient,
    private route: ActivatedRoute
  ) { }
  
  //wrap category object in a proper way
  registerCategory(category : Category){
    const body: Category = {
      title : category.title,
      text : category.text
    }

    return this._http.post(`${environment.apiUrl}/categories`, body);
  }
  //get a category json
  getCategoriesJson() {
    return this._http.get<CategoryJson[]>(`${environment.apiUrl}/categories`).pipe(
      map(
        (jsonArray: Object[]) => jsonArray['hydra:member'].map(
          jsonItem => CategoryJson.fromJson(jsonItem)
          ) 
      )
    )
  }
  //get All posts
  getCategories(){
    return this._http.get<Category[]>(`${environment.apiUrl}/categories`)
  }

  //delete a post by id
  delete(id: number) {
    return this._http.delete(`${environment.apiUrl}/categories/${id}`);
  }

  //get a post by id
  getCategory(id: number) {
    return this._http.get<Category>(`${environment.apiUrl}/categories/${id}`);
  }

  //edit category
  editCategory(category : Category, id: number){
    const body: Category = {
      title : category.title,
      text : category.text
    }
    const headers = new HttpHeaders({'Content-Type':'application/merge-patch+json; charset=utf-8'});
    return this._http.patch(`${environment.apiUrl}/categories/${id}`, body, {headers: headers});
  }
}
