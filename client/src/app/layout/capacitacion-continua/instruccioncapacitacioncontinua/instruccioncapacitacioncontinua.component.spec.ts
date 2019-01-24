import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { InstruccionCapacitacionContinuaComponent } from './instruccioncapacitacioncontinua.component';

describe('InstruccionCapacitacionContinuaComponent', () => {
   let component: InstruccionCapacitacionContinuaComponent;
   let fixture: ComponentFixture<InstruccionCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ InstruccionCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(InstruccionCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
