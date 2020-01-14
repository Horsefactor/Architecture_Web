import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/security/auth.service';
import { UserService } from '../shared/users/user.service';
import { first } from 'rxjs/operators';
import { User } from '../shared/users/user.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: ['']
})
export class HomeComponent implements OnInit {

  constructor() {}

  ngOnInit() {}
}
