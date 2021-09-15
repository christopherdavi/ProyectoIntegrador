import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdvertisingRecomendedComponent } from './advertising-recomended.component';

describe('AdvertisingRecomendedComponent', () => {
  let component: AdvertisingRecomendedComponent;
  let fixture: ComponentFixture<AdvertisingRecomendedComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdvertisingRecomendedComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AdvertisingRecomendedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
