import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { CicloCapacitacionContinuaRoutingModule } from './ciclocapacitacioncontinua-routing.module';
import { CicloCapacitacionContinuaComponent } from './ciclocapacitacioncontinua.component';
import { CicloCapacitacionContinuaService } from './ciclocapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      CicloCapacitacionContinuaRoutingModule
   ],
   providers: [CicloCapacitacionContinuaService],
   declarations: [CicloCapacitacionContinuaComponent],
})
export class CicloCapacitacionContinuaModule { }
