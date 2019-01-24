import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { CicloCapacitacionContinuaComponent } from './ciclocapacitacioncontinua.component';

describe('CicloCapacitacionContinuaComponent', () => {
   let component: CicloCapacitacionContinuaComponent;
   let fixture: ComponentFixture<CicloCapacitacionContinuaComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ CicloCapacitacionContinuaComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(CicloCapacitacionContinuaComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});
