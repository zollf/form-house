import React from 'react';
import { render } from '@testing-library/react';

import Fields from './';

it('matches its snapshot', () => {
  expect(render(<Fields />).baseElement).toMatchSnapshot();
});