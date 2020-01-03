import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { BehaviorSubject, Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { Post, GetPost } from './post.model';
import { AuthService } from '../security/auth.service';

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
  addPost(post: Post) {
    
    const body: Post = {
      content: post.content,
      categories: post.categories,
      createdAT: this.currentDate,
      user: `/api/users/${this.authService.currentUserValue.id}`
    }
    console.log(body)
    
    return this._http.post(`${environment.apiUrl}/annonces`, body);
  }
}
