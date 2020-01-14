import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { BehaviorSubject, Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { Post, GetPost } from './post.model';
import { AuthService } from '../security/auth.service';
import { ActivatedRoute } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  
  private currentDate = new Date;
  private criteriaSubject = new BehaviorSubject<string[]>(null);
  public criteria: Observable<string[]>;

  constructor(
    private _http : HttpClient,
    private authService: AuthService
  ) { 
    this.criteria = this.criteriaSubject.asObservable();
  }
  
  public get criteriaValue(){
    return this.criteriaSubject.value;
  }

  //observable to transmit criterium between sibling components
  changeCriteria(criteria: string[]){
    this.criteriaSubject.next(criteria)
  }

  //get All posts
  getPosts():Observable<GetPost[]>{ 
    return this._http.get<GetPost[]>(`${environment.apiUrl}/annonces`); 
  }

  // get all posts of the currentUser
  getMyPosts():Observable<GetPost[]>{
    return this._http.get<GetPost[]>(`${environment.apiUrl}/users/${this.authService.currentUserValue.id}/annonces`)
  }
  
  //delete a post by id
  delete(id: number) {
    return this._http.delete(`${environment.apiUrl}/annonces/${id}`);
  }

  //get a post by id
  getPost(id: number):Observable<GetPost> {
    return this._http.get<GetPost>(`${environment.apiUrl}/annonces/${id}`);
  }
  //wrap post object in a proper way and add it
  addPost(post: Post) {
    
    const body: Post = {
      content: post.content,
      createdAT: this.currentDate,
      categories: post.categories,
      user: `/api/users/${this.authService.currentUserValue.id}`
    };
    console.log(body);
    
    return this._http.post(`${environment.apiUrl}/annonces`, body);
  }
  //edit a post thanks to a api request
  editPost(post: Post, id:number) {
    
    const body: Post= {
      content: post.content,
      categories: post.categories,
    };

    console.log(body);
    console.log(id);

    const headers = new HttpHeaders({'Content-Type':'application/merge-patch+json; charset=utf-8'});
    return this._http.patch(`${environment.apiUrl}/annonces/${id}`, body, {headers: headers});
  }
}
