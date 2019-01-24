import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { CursoCapacitacionContinuaComponent } from './cursocapacitacioncontinua.component';

describe('CursoCapacitacionContinuaComponent', () => {
   let component: CursoCapacitacionContinuaComponent;
   let fixture: ComponentFixture<CursoCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ CursoCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(CursoCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
