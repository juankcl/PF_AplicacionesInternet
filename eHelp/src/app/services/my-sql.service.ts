import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { User, Session } from './classes';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class MySQLService {

  PHP_API_SERVER = "http://localhost/api";

  constructor(private httpClient: HttpClient) { }

  login(user: User): Observable<Session> {
    return this.httpClient.post<Session>(`${this.PHP_API_SERVER}/ion-login.php`, user);
  }
  

}
