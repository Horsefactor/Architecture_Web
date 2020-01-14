import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { User } from './user.model';
import { environment } from 'src/environments/environment';
import { AuthService } from '../security/auth.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(
    private http: HttpClient,
    private authService: AuthService
  ) { }

  //wrap user object in a proper way and add it
  registerUser(user : User){
    const body: User = {
      name: user.name,
      surname: user.surname,
      email: user.email,
      age: user.age,
      phoneNumber: user.phoneNumber,
      address: user.address,
      password: user.password,
      type: user.type
    }
    
    return this.http.post(`${environment.apiUrl}/users`, body);
  }
  //send a request to delete a user by his id
  delete(id: number) {
    return this.http.delete(`${environment.apiUrl}/users/${id}`);
  }

  //get a user by id
  getUser(id: number) {
    return this.http.get<User>(`${environment.apiUrl}/users/${id}`);
  }
  
  //get all users
  getAll() {
    return this.http.get<User[]>(`${environment.apiUrl}/users`);
  }

  //patch a user
  editUser(user : User){
    const body: User = {
      name: user.name,
      surname: user.surname,
      email: user.email,
      age: user.age,
      phoneNumber: user.phoneNumber,
      address: user.address,
      password: user.password,
      type: user.type
    }
    
    const headers = new HttpHeaders({'Content-Type':'application/merge-patch+json; charset=utf-8'});
    return this.http.patch(`${environment.apiUrl}/users/${this.authService.currentUserValue.id}`, body, {headers: headers});
  }

}
