import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { User } from './user.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private http: HttpClient) { }

  //add a user
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

}
