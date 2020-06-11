import { TestBed } from '@angular/core/testing';

import { MySQLService } from './my-sql.service';

describe('MySQLService', () => {
  let service: MySQLService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MySQLService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
