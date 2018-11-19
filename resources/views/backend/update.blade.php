@include('backend.backhead')
<html>
   
   <head>
      <title>Student Management | Edit</title>
   </head>
   
   <body>
      <form action = "/edit/<?php echo $products[0]->product_id; ?>" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      
         <table>
            <tr>
               <td>Name</td>
               <td>
                  <input type = 'text' name = 'product_name' 
                     value = '<?php echo$products[0]->product_name; ?>'/>
               </td>
              
               <td>Price</td>
               <td>
                  <input type = 'number' name = 'price' 
                     value = '<?php echo$products[0]->price; ?>'/>
               </td>
              
               <td>Category</td>
               <td>
                <select name="category" id="category" class="control-group">
                  <placeholder> Select One Value Only</placeholder>
                  <option value = '<?php echo$products[0]->category; ?>'>Sushi</option>
                  <option value = '<?php echo$products[0]->category; ?>'">Drinks</option>
              </select>

                </td>
                

               <td>Product Description</td>
               <td>
                  <input type = 'text' name = 'product_description' 
                     value = '<?php echo$products[0]->product_description; ?>'/>
               </td>



            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Update student" />
               </td>
            </tr>
         </table>

      </form>
   
   </body>
</html>