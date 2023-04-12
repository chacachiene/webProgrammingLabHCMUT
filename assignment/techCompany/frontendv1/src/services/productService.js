import axios from 'axios';

const PRO_API_URL = "http://localhost:80/api/product/index.php";


export const getProducts = async() =>{
    try{
        const response = await axios.get(PRO_API_URL);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}
export const createProduct = async (product)=>{
    try{
        const response = await axios.post(PRO_API_URL, product);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}
export const getProductById = async (productId) =>{
    try{
        const response = await axios.get(PRO_API_URL + '/' + productId);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}

export const updateProduct= async (product, productId) =>{
    try{
        const response = await axios.put(PRO_API_URL + '/' + productId, product);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}

export const deleteProduct = async (productId)=>{
    try{
        const response = await axios.delete(PRO_API_URL + '/' + productId);
        return response.data;
    } catch(error){
        console.log(error);
        return null;
    }
}