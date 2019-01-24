import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PerfilInglesComponent  } from './perfil-ingles.component';

describe('PerfilInglesComponent ', () => {
  let component: PerfilInglesComponent ;
  let fixture: ComponentFixture<PerfilInglesComponent >;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PerfilInglesComponent  ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PerfilInglesComponent );
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
