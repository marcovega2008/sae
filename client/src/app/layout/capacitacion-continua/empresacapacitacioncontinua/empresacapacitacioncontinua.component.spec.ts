import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { EmpresaCapacitacionContinuaComponent } from './empresacapacitacioncontinua.component';

describe('EmpresaCapacitacionContinuaComponent', () => {
   let component: EmpresaCapacitacionContinuaComponent;
   let fixture: ComponentFixture<EmpresaCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ EmpresaCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(EmpresaCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
