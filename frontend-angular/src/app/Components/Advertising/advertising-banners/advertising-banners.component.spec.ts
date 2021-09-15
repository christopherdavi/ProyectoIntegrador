import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdvertisingBannersComponent } from './advertising-banners.component';

describe('AdvertisingBannersComponent', () => {
  let component: AdvertisingBannersComponent;
  let fixture: ComponentFixture<AdvertisingBannersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdvertisingBannersComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AdvertisingBannersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
