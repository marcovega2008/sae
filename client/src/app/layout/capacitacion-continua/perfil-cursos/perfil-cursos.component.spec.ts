import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PerfilCursosComponent } from './perfil-cursos.component';

describe('PerfilCursosComponent', () => {
  let component: PerfilCursosComponent;
  let fixture: ComponentFixture<PerfilCursosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PerfilCursosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PerfilCursosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
