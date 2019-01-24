import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { CupoInglesCapacitacionContinuaComponent } from './cupoinglescapacitacioncontinua.component';

describe('CupoInglesCapacitacionContinuaComponent', () => {
   let component: CupoInglesCapacitacionContinuaComponent;
   let fixture: ComponentFixture<CupoInglesCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ CupoInglesCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(CupoInglesCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
