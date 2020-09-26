import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewReimbComponent } from './view-reimb.component';

describe('ViewReimbComponent', () => {
  let component: ViewReimbComponent;
  let fixture: ComponentFixture<ViewReimbComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ViewReimbComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewReimbComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
