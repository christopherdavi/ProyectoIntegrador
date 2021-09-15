import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdvertisingFlyersComponent } from './advertising-flyers.component';

describe('AdvertisingFlyersComponent', () => {
  let component: AdvertisingFlyersComponent;
  let fixture: ComponentFixture<AdvertisingFlyersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdvertisingFlyersComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AdvertisingFlyersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
