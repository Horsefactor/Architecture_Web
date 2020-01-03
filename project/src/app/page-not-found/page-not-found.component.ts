import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-page-not-found',
  template: `<div class="card text-white border-success bg-primary mb-3">
                <div class="container">
                  <br/>
                  <p> Page not found </p>
                </div>
              </div>`,
  styles: ['']
})
export class PageNotFoundComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
