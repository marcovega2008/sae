import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { HorarioCapacitacionContinuaComponent } from './horariocapacitacioncontinua.component';

describe('HorarioCapacitacionContinuaComponent', () => {
   let component: HorarioCapacitacionContinuaComponent;
   let fixture: ComponentFixture<HorarioCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ HorarioCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(HorarioCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
