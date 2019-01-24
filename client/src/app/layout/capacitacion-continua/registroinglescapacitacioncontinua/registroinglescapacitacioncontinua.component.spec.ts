import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { RegistroInglesCapacitacionContinuaComponent } from './registroinglescapacitacioncontinua.component';

describe('RegistroInglesCapacitacionContinuaComponent', () => {
   let component: RegistroInglesCapacitacionContinuaComponent;
   let fixture: ComponentFixture<RegistroInglesCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ RegistroInglesCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(RegistroInglesCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
