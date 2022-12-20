import React from 'react';
import { createRoot } from 'react-dom/client'
import Layout from './Component/Layout';

export default function App(){
    return(
      
        <Layout />
      
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}
