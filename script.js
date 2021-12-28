	//create module
var app = angular.module('listMaker',[]);
	//create controller
app.controller('myCtrl',function($scope,$http)
	{		

				//UPDATE DATA FROM DATABASE------STEP-3
			$scope.updatedb = function(x,y,z){
				$scope.id = x;
				$scope.name = y;
				$scope.phone = z;
				$scope.btnname = "update";
			}



				//FETCH DATA FROM DATABASE--------STEP-2
			$scope.updatetbl = function(){
				$http.get('fetch.php').success(function(data){
					$scope.value = data
				})
			}


				//ADD DATA TO DATABASE -----SETP-1
			$scope.btnname = 'ADD'

			$scope.insertdataDb = function(){

				//alert for testing VALUE [PASS OR NOT]
				//alert($scope.form.name+" "+$scope.form.phone);
						
						//IF NAME IS = EMPTY RETURN VALUE 						
				if ($scope.name == null) {alert('insert name')}
						//IF PHONE IS = EMPTY RETURN VALUE
				else if($scope.phone == null) {alert('insert phone number')}
						//ELSE POST DATA TO PHP FILE
				else
					{
						$http.post('insert.php',{
							//PASS THE VALUE 			
			'output_name': $scope.name,
			'output_phone': $scope.phone,
			'output_btnname': $scope.btnname,
			'output_id': $scope.id,
												}
								  ).success(function(data){
								  	alert(data);								  	
						//THIS FOR EMPTY THE INPUT FIELD AFTER ADD
								  	$scope.name = null;
								  	$scope.btnname ='ADD';
								  	$scope.phone = null;								  									  	
		//NOTE: this scope for autoupdate data after add data in database !!!!
								  	$scope.updatetbl();								  	
								  })

					}
			}
	});