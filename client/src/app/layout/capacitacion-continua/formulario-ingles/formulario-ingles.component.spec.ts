import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormularioInglesComponent } from './formulario-ingles.component';

describe('FormularioInglesComponent', () => {
  let component: FormularioInglesComponent;
  let fixture: ComponentFixture<FormularioInglesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormularioInglesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormularioInglesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
