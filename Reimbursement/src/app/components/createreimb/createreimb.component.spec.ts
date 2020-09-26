import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreatereimbComponent } from './createreimb.component';

describe('CreatereimbComponent', () => {
  let component: CreatereimbComponent;
  let fixture: ComponentFixture<CreatereimbComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreatereimbComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreatereimbComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
