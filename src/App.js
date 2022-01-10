
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'

import logo from './logo.svg';
import './App.css';
import Header from './components/Header';
import Banner from './components/Banner';
import Footer from './components/Footer';
import Signup from './components/Signup';
import Signin from './components/Signin';
import Services from './components/Services';
import Dashboard from './components/Dashboard';

function App() {
  return (
    <>
      <Router>
        <Header />
        <Routes>
          <Route path='/' element={<Banner />}/>
          <Route path='/signup' element={<Signup />}/>
          <Route path='/signin' element={<Signin />}/>
          <Route path='/services' element={<Services />}/>
          <Route path='/dashboard' element={<Dashboard />}/>
        </Routes>
        <Footer />
      </Router>
    </>
  );
}

export default App;
