import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { User } from '../users/user.model';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private currentUserSubject: BehaviorSubject<User>;
  public currentUser: Observable<User>;

  constructor(private _http: HttpClient) {
      this.currentUserSubject = new BehaviorSubject<User>(JSON.parse(localStorage.getItem('currentUser')));
      this.currentUser = this.currentUserSubject.asObservable();
  }

  public get currentUserValue(): User {
      return this.currentUserSubject.value;
  }


  login(email: string, password: string) {
      return this._http.post<any>(`${environment.apiUrl}/authentication_token`, { email, password })
                      .pipe(map(user => {
                          user.id = user.data.id;
                          user.name = user.data.name;
                          user.surname = user.data.surname;
                          user.age = user.data.age;
                          user.email = user.data.email;
                          user.phoneNumber = user.data.phoneNumber;
                          user.type = user.data.type;
                          delete user.data;
                          console.log(user);
                          // store user details and jwt token in local storage to keep user logged in between page refreshes
                          localStorage.setItem('currentUser', JSON.stringify(user));

                          return user;
                      }));
  }

  logout() {
      // remove user from local storage to log user out
      localStorage.removeItem('currentUser');
      this.currentUserSubject.next(null);
  }

}
