import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { User, Session, Message, Alerta } from './classes';
import { Observable } from 'rxjs';

import { StorageService } from './storage.service';

@Injectable({
  providedIn: 'root'
})
export class MySQLService {

  PHP_API_SERVER = "http://localhost/api";

  constructor(
    private httpClient: HttpClient,
    private storage:StorageService
  ) { }

  login(user: User): Observable<Session> {
    return this.httpClient.post<Session>(`${this.PHP_API_SERVER}/ion-login.php`, user);
  }

  registro(new_user: User): Observable<Message> {
    return this.httpClient.post<Message>(`${this.PHP_API_SERVER}/ion-register.php`, new_user);
  }

  latitude: any;
  longitude: any;

  
  alerta: Alerta = {userid: null, latitud: null, longitud: null};

  mandarAlerta() {
    if (navigator.geolocation) {
      let user = this.storage.getCurrentUser();

      this.alerta.userid = user.id;

      let options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
      };

      let self = this;

      navigator.geolocation.getCurrentPosition(function (position) {
        self.foundLoc(position, self);
      }, this.error, options);

      console.log(this.latitude);
      return;
    } else {
      this.storage.presentToast("ERROR", "danger");
    }
  }

  foundLoc(pos, self) {
    console.log(pos);
    
    console.log(self.storage.getCurrentUser());

    var alerta = { latitud: pos.coords.latitude, longitud: pos.coords.longitude, userId: self.storage.getCurrentUser().userId };

    console.log(alerta);
    this.httpClient.post(`${this.PHP_API_SERVER}/ion-alerta.php`, alerta);
  }

  error(err){
    console.log("Error inesperado("+ err.code + "): " + err.message,"danger");
  }

}
