import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { RegistroCursosCapacitacionContinuaComponent } from './registrocursoscapacitacioncontinua.component';

describe('RegistroCursosCapacitacionContinuaComponent', () => {
   let component: RegistroCursosCapacitacionContinuaComponent;
   let fixture: ComponentFixture<RegistroCursosCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ RegistroCursosCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(RegistroCursosCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
