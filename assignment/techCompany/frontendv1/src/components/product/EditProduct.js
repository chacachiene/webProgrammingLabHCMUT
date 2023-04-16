import React from 'react';
import { useState } from 'react';
import { Button, TextField,Box } from '@mui/material';
import {useLocation, useNavigate, useParams} from 'react-router-dom';
import axios from 'axios';
import { useEffect } from 'react';
import { getProductById, updateProduct } from 'services/productService';


function EditProduct() {
    const location = useLocation();
    const navigate = useNavigate();
    const [product, setProduct] = useState({
        name: '',
        price: '',
        amount: '',
        description: '',

    });
    const {id} = useParams();
    React.useEffect(() => {
      async function fetchData() {
        try {
          const response = await getProductById(id);
          
          // const newData = response.map((product) => {
          //   return createData(product.id, product.name, product.price, product.amount, product.description, product.image);
          // });
          setProduct(response[0]);
          console.log("aaaaa");
          console.log(response[0]);
  
        } catch (error) {
          console.error(error);
        }
      }
      fetchData();
    }, []);
    const handleChange = (e) => {
        e.preventDefault();
        const { name, value } = e.target;
        setProduct({ ...product, [name]: value });
    }
    const handleSubmit = (e) => {
        e.preventDefault();
        updateProduct(id, product).then(function(response){
            navigate('/product');
        }
        );
    }
  return (

      <div>
      <h1 > CREATE NEW PRODUCT</h1>
     <Box
      component="form"
      sx={{
        '& > :not(style)': { m: 1, width: "100%" },
      }}
      noValidate
      autoComplete="off"
    >
      <TextField value={product.name} id="outlined-basic" label="Name" variant="outlined" type="text" required name="name" onChange={handleChange}/>
      <TextField value={product.price} id="filled-basic" label="Price" variant="filled" type="number" required name="price" onChange={handleChange}/>
      <TextField value={product.amount} id="amo" label="Amount" variant="filled" type="number" required name="amount" onChange={handleChange}/>
      <TextField value={product.description} id="des" label="Description" variant="standard" type="text" required name="description" onChange={handleChange}/>
      <Button variant="contained" onClick={handleSubmit}>Submit</Button>
      
    </Box>

    </div>
  )
}

export default EditProduct;
