import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { MatriculaInglesCapacitacionContinuaComponent } from './matriculainglescapacitacioncontinua.component';

describe('MatriculaInglesCapacitacionContinuaComponent', () => {
   let component: MatriculaInglesCapacitacionContinuaComponent;
   let fixture: ComponentFixture<MatriculaInglesCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ MatriculaInglesCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(MatriculaInglesCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
