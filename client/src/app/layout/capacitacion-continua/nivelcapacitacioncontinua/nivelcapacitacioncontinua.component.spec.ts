import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { NivelCapacitacionContinuaComponent } from './nivelcapacitacioncontinua.component';

describe('NivelCapacitacionContinuaComponent', () => {
   let component: NivelCapacitacionContinuaComponent;
   let fixture: ComponentFixture<NivelCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ NivelCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(NivelCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
