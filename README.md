
# Lendable Fee Calculator Test

## Env
Dokerized app, Php8 on Nginx  
App launches an input form for terms and loan amount  
When submitting, results are ajax shown on right panel and logged in lower panel.  

## Controllers:
app/Http/Controllers/FeeCalculationController.php  
app/Http/Controllers/LoanApplicationController.php 

## Interfaces:
app/Interfaces/FeeCalculatorInterface.php

## Models:
app/Models/ApplicantModel.php  
app/Models/ApplicationModel.php  

## Providers:
app/Providers/FeeBreakpointsServiceProvider.php

## Repositories:
app/Repositories/FeeBreakpointRepository.php

## Traits:
app/Traits/CalculateFee.php

## Views:
resources/views/loanApplication/index.blade.php

## Routes: 
routes/web.php

## Tests:
- Feature (integration)  
	tests/Feature/CalculationTest.php  
	tests/Feature/RouteTest.php  
- Unit  
	tests/Unit/CalculationTraitTest.php  
	tests/Unit/FeeBreakpointRepositoryTest.php  
