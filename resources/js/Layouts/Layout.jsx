import React from 'react';
import Header from '@/Components/Header';
import Footer from '@/Components/Footer';

const Layout = ({ children }) => {
  return (
    <div>
      {/* Your menu component here */}
      <Header/>

      {/* Page content */}
      {children}

      {/* Your footer component here */}
      <Footer/>
    </div>
  );
};

export default Layout;