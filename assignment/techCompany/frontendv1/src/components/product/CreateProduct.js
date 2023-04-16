import React from 'react';
import { useState } from 'react';
import { Button, Box, TextField } from '@mui/material';
import {useLocation, useNavigate} from 'react-router-dom';
import axios from 'axios';
import { useEffect } from 'react';
import { getProductById, updateProduct } from 'services/productService';



function CreateProduct() {
    const location = useLocation();
    const navigate = useNavigate();
    const [product, setProduct] = useState({
        name: '',
        price: '',
        amount: '',
        description: '',

    })
    const handleChange = (e) => {
        e.preventDefault();
        const { name, value } = e.target;
        setProduct({ ...product, [name]: value });
    }
    const handleSubmit = (e) => {
        e.preventDefault();
        console.log(product);
        axios.post('http://localhost:80/api/product/index.php', product ).then(function(response){
            console.log(response.data);
            navigate('/product');
        });
    }

    // just test
 
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
      <TextField id="outlined-basic" label="Name" variant="outlined" type="text" required name="name" onChange={handleChange}/>
      <TextField id="filled-basic" label="Price" variant="filled" type="number" required name="price" onChange={handleChange}/>
      <TextField id="amo" label="Amount" variant="filled" type="number" required name="amount" onChange={handleChange}/>
      <TextField id="des" label="Description" variant="standard" type="text" required name="description" onChange={handleChange}/>
      <Button variant="contained" onClick={handleSubmit}>Submit</Button>
      
    </Box>
    </div>
  )
}

export default CreateProduct;
{/* <input type="text" required name="name" onChange={handleChange} className="form-control" /> */}
            {/* <br />
            <label>Price </label>
            <input type="number" required name="price" onChange={handleChange} className="form-control" />
            <br />
            <label>Amount </label>
            <input type="number" required name="amount" onChange={handleChange} className="form-control" />
            <br />
            <label>Description </label>
           

            <input type="text" required name="description" onChange={handleChange} className="form-control" />
            <br /> */}